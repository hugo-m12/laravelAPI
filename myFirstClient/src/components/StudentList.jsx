import { useEffect, useState } from "react";
import StudentService from "../services/StudentService";
import { Link } from "wouter";

function StudentList() {

  function addStudent() {
    StudentService.createStudent();
  }

    function deleteStudent(id) {
        if (!confirm("do you want to delete?")) return;
        //remove do sv de BE
        StudentService.deleteStudent(id);

        //remove da memoria do FE
        const filtered = students.filter((value) => value.id !== id);
        setStudents(filtered);
    }

    const [students, setStudents] = useState([]);

    useEffect(function () {
        (async function () {
            const result = await StudentService.getAllStudents();
            setStudents(result);
        })();
    }, []);
    return (
        <>

<a href="/newstudent"><button >Add Student </button> </a>
          <table border="1">
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
          {students.map((student) => (
            <tr key={student.id}>
              <td>{student.id}</td>
              <td>{student.name}</td>
              <td>{student.created_at}</td>
              <td>{student.updated_at}</td>
              <td>
                <button>Edit</button>
                <button onClick={() => deleteStudent(student.id)}>Delete</button>
              </td>
            </tr>
          ))}
        </tbody>
          </table>
        </>
      );
    }
    
    export default StudentList;

    //<button onClick={() => addStudent()}>ADD RaNDOM STUDENT</button>
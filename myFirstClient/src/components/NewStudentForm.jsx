import StudentService from "../services/StudentService";
import { useState } from "react";

function NewStudentForm() {
    const [student, setStudent] = useState("");

    async function AddStudentHandler(event) {
        event.preventDefault();
        await StudentService.createStudent(student);
        setStudent("");
        alert(student + "was added ");
    }

    return (
        <>
            <h1>New Student Form</h1>

            <form method="POST">
                <div>
                    <input
                        value={student}
                        onChange={(e) => setStudent(e.target.value)}
                        placeholder="Name"
                    ></input>
                    <button onClick={AddStudentHandler}> Add Student </button>
                </div>
            </form>
        </>
    );
}

export default NewStudentForm;

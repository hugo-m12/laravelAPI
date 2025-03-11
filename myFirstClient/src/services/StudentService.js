
const url = "http://localhost:8000/api/students";

async function getAllStudents(){
    const response = await fetch(url);
    const result = await response.json();

    return result;
}

async function deleteStudent(id){
    const deleteURL = url + "/" + id;
    const response = await fetch(deleteURL, {
        method: "DELETE"
    });
    return response.ok;
}

async function createStudent(name){

    const student = {
        name: name
    };
    const body = JSON.stringify(student);

    const response = await fetch(url,{
        method: "POST",
        headers: {
            "Content-type":"application/json; charset=UTF-8",  
        },
        body: body
    });
    const result = await response.json();
    return result;
}

export default 
{
    getAllStudents,
    deleteStudent,
    createStudent
};  
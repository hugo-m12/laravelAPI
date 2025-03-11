import Head from "./components/Head";
import NewStudentForm from "./components/NewStudentForm";
import StudentList from "./components/StudentList";
import { Route, Switch } from "wouter";

function App() {
    return (
        <>
            <Head />
            <Switch>
                <Route exact path="/" component={StudentList} />
                <Route path="/newstudent" component={NewStudentForm} />
            </Switch>
        </>
    );
}

export default App;

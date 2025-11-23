Part 2 — Code Review & Debug
A. Laravel Snippet
public function store(Request $request)
 {
 	$task = Task::create($request->all());
return response()->json($task);
}
Questions:

1.  What issues do you see in this implementation?

-   Allows all incoming request fields to be inserted, even fields the user should not control (mass assignment vulnerability).
-   There's zero validation. The method accepts any malformed or missing data which will lead to inconsistent database values.
-   If something fails the code will throw an exception and return a 500 error instead of a clean JSON response.
-   No authorization check to ensure the user has permission to create tasks.
-   No rate limiting to prevent abuse.

2.  How would you improve it for security and maintainability?

-   Validate allowed fields before creating anything.
-   Using $request->only([...]) protects against mass assignment.
-   Prevents 500-level crashes.

B. React Snippet
function AddTask() {
const [title, setTitle] = useState('');

const handleSubmit = (e) => {
axios.post('/api/tasks', { title });
};

return (

<form onSubmit={handleSubmit}>
<input value={title} onChange={e => setTitle(e.target.value)} />
<button>Add</button>
</form>
);
}
Questions:

1.  Identify at least two issues in this code.
    -   No Error Handling / No Success Handling
    -   Missing e.preventDefault()
2.  Suggest improvements.
    -   Add e.preventDefault() to stop page refresh
    -   Add error handling for axios

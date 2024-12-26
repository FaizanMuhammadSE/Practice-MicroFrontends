import { useState, lazy, Suspense } from 'react';

// @ts-expect-error Type-Not-Resolved
const List = lazy(() => import('todo_components/List'));
// @ts-expect-error Type-Not-Resolved
const Input = lazy(() => import('todo_components/Input'));

function App() {
  const [todos, setTodos] = useState<string[]>([]);
  const submitHandler = (todo: string) => setTodos((pre) => [todo, ...pre]);

  return (
    <div style={{ margin: '0 auto' }}>
      <Suspense fallback={<p>Loading...</p>}>
        <Input onSubmit={submitHandler} />
        <List items={todos} />
      </Suspense>
    </div>
  );
}

export default App;

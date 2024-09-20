import { useState } from 'react';
import './App.css';
import Input from './components/Input';
import List from './components/List';

function App() {
  const [items, setItems] = useState<string[]>(['React', 'Vite']);

  const submitHandler = (todo: string) => setItems((pre) => [todo, ...pre]);

  return (
    <>
      <Input onSubmit={submitHandler} />
      <List items={items} />
    </>
  );
}

export default App;

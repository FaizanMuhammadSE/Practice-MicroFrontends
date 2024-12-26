import { ComponentType, ChangeEvent } from 'react';
// types/todo_components.d.ts
declare module 'todo_components/List' {
  const List: ComponentType<{ items: string[] }>;
  export default List;
}

declare module 'todo_components/Input' {
  const Input: ComponentType<{
    value: string;
    onChange: (e: ChangeEvent<HTMLInputElement>) => void;
    onSubmit: () => void;
  }>;
  export default Input;
}

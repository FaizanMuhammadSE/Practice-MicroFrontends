import { FC, useState } from 'react';

const Input: FC<{ onSubmit: (val: string) => void }> = ({ onSubmit }) => {
  const [value, setValue] = useState('');
  return (
    <div className='flex-row'>
      <input
        type='text'
        value={value}
        onChange={(e) => setValue(e.target.value)}
      />
      <button onClick={() => onSubmit(value)}>Add</button>
    </div>
  );
};

export default Input;

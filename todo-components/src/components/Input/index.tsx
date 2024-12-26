import { FC, useState } from 'react';
import styles from './Input.module.css';

const Input: FC<{ onSubmit: (val: string) => void }> = ({ onSubmit }) => {
  const [value, setValue] = useState('');
  return (
    <div className={styles.container}>
      <input
        type='text'
        placeholder='type here...'
        value={value}
        onChange={(e) => setValue(e.target.value)}
        className={styles.input}
      />
      <button
        onClick={() => {
          onSubmit(value);
          setValue('');
        }}
        className={styles.button}
      >
        Add
      </button>
    </div>
  );
};

export default Input;

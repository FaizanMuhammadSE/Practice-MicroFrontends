import { FC } from 'react';
import styles from './list.module.css';

const List: FC<{ items: string[] }> = ({ items }) => {
  return (
    <ul className={styles.list}>
      {items.map((item, index) => (
        <li className={styles.listItem} key={index}>
          {item}
        </li>
      ))}
    </ul>
  );
};

export default List;

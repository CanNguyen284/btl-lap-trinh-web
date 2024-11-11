'use client';

import { useRouter } from 'next/navigation';
import { useEffect, useState } from 'react';

const novels = [
  { id: 1, title: 'Novel One', content: 'This is the content of the first novel.' },
  { id: 2, title: 'Novel Two', content: 'This is the content of the second novel.' },
  { id: 3, title: 'Novel Three', content: 'This is the content of the third novel.' },
];

function NovelDetail() {
  const router = useRouter();
  const { id } = router.query;
  const [novel, setNovel] = useState(null);

  useEffect(() => {
    if (id) {
      const foundNovel = novels.find((n) => n.id === parseInt(id as string));
      setNovel(foundNovel);
    }
  }, [id]);

  return (
    <div className="novel-detail">
      {novel ? (
        <>
          <h2>{novel.title}</h2>
          <p>{novel.content}</p>
        </>
      ) : (
        <p>Novel not found.</p>
      )}
    </div>
  );
}

export default NovelDetail;
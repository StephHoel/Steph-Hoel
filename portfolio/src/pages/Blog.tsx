import { useEffect, useState } from 'react'

import { api } from '../lib/axios'
import { Post } from '../lib/props'

export default function Blog() {
  const [posts, setPosts] = useState<Post[]>([])

  useEffect(() => {
    async function call() {
      const response = await api.get('/post')

      setPosts(response.data)
    }

    call()
  }, [])

  return (
    <div className="grid gap-4">
      <p className="text-5xl text-center">Blog</p>

      <div className="text-2xl text-justify">
        {posts.length > 0 ? (
          <div key={posts[0].idPost}>{posts[0].content}</div>
        ) : (
          <p className="text-2xl text-center">Em breve mais informações</p>
        )}
      </div>

      <div className="mt-4 text-3xl">
        Se quiser ler mais, entre no{' '}
        <a href="https://stephhoel.github.io/blog/">{'> BLOG <'}</a>
      </div>
    </div>
  )
}

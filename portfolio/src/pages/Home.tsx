import { useEffect, useState } from 'react'
import ReactMarkdown from 'react-markdown'
import { Link } from 'react-router-dom'

import { api } from '../lib/axios'
import { Path, Post } from '../lib/props'

export default function Home() {
  const apiKey = process.env.REACT_APP_API_KEY
  const channelID = process.env.REACT_APP_CHANNEL_ID
  const [videoId, setVideoId] = useState<string | null>('FsIJ-FVY_lc')

  const [posts, setPosts] = useState<Post[]>([])

  useEffect(() => {
    async function fetchLastVideo() {
      try {
        const response = await fetch(
          `https://www.googleapis.com/youtube/v3/search?key=${apiKey}&channelId=${channelID}&part=snippet,id&order=date&maxResults=1`,
        )

        const data = await response.json()

        // console.log(data)

        if (data.items && data.items.length > 0) {
          const videoId = data.items[0].id.videoId
          setVideoId(videoId)
        }
      } catch (error) {
        console.error('Erro ao buscar o último vídeo:', error)
      }
    }

    async function call() {
      const response = await api.get('/post')

      setPosts(response.data)
    }

    fetchLastVideo()
    call()
  }, [apiKey, channelID])

  return (
    <div className="gap-4 grid">
      <div className="text-5xl text-center">
        <Link to={Path.blog}>Último Post</Link>
      </div>
      <div className="text-2xl text-justify">
        {posts.length > 0 ? (
          <>
            <ReactMarkdown key={posts[0].idPost}>
              {posts[1].content
                .substring(0, 500)
                .concat(posts[1].content.length > 500 ? '...' : '')}
            </ReactMarkdown>

            <div className="mt-4 text-3xl text-center">
              Se quiser ler mais, entre no{' '}
              <a href="https://stephhoel.github.io/blog/">{'> BLOG <'}</a>
            </div>
          </>
        ) : (
          <p className="text-2xl text-center">Em breve mais informações</p>
        )}
      </div>
      <hr />
      <div className="text-5xl text-center p-2.5 grid gap-4">
        <p>Último Vídeo</p>
        <div>
          {videoId ? (
            <iframe
              className="mx-auto"
              src={`https://www.youtube.com/embed/${videoId}`}
              title="Vídeo do YouTube"
              frameBorder="0"
              allowFullScreen
            />
          ) : (
            <p className="select-none text-3xl">Carregando...</p>
          )}
        </div>
      </div>
    </div>
  )
}

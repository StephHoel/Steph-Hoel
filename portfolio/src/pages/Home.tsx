import { useEffect, useState } from 'react'
import { Path } from '../lib/props'
import { Link } from 'react-router-dom'

export default function Home() {
  const apiKey = process.env.REACT_APP_API_KEY
  const channelID = process.env.REACT_APP_CHANNEL_ID
  const [videoId, setVideoId] = useState<string | null>('FsIJ-FVY_lc')

  useEffect(() => {
    const fetchLastVideo = async () => {
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
    fetchLastVideo()

    // eslint-disable-next-line react-hooks/exhaustive-deps
  }, [])

  return (
    <div className="gap-4 grid">
      <div className="text-5xl text-center normal-case">
        <Link to={Path.blog}>Último Post</Link>
      </div>
      <div className="text-lg text-justify normal-case">
        {/* <?php posts($conexao, 1, ""); ?> */}
        Último post aqui
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

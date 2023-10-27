import { useEffect, useState } from 'react'

export default function Videos() {
  const apiKey = process.env.REACT_APP_API_KEY
  const channelID = process.env.REACT_APP_CHANNEL_ID
  const [videosId, setVideosId] = useState<string[]>(['FsIJ-FVY_lc'])

  useEffect(() => {
    const fetchLastsVideos = async () => {
      try {
        const response = await fetch(
          `https://www.googleapis.com/youtube/v3/search?key=${apiKey}&channelId=${channelID}&part=snippet,id&order=date&maxResults=15`,
        )

        const data = await response.json()

        // console.log(data)

        const videos = []
        if (data.error.code !== 403 && data.items && data.items.length > 0) {
          for (let i = 0; i < data.items.length; i++) {
            videos.push(data.items[i].id.videosId)
          }
          // const videosId = data.items[0].id.videosId
          // setVideosId(videosId)
          setVideosId(videos)
        }
      } catch (error) {
        console.error('Erro ao buscar os últimos vídeos: ', error)
      }
    }
    fetchLastsVideos()

    // eslint-disable-next-line react-hooks/exhaustive-deps
  }, [])

  return (
    <div>
      <p className="text-5xl text-center">Vídeos recentes</p>

      <div className="grid gap-4">
        {videosId?.length > 0 &&
          videosId.map((videoId) => (
            <iframe
              key={videoId}
              className="mx-auto"
              src={`https://www.youtube.com/embed/${videoId}`}
              title="Vídeo do YouTube"
              frameBorder="0"
              allowFullScreen
            />
          ))}

        {videosId.length <= 1 && (
          <p className="select-none text-3xl">Carregando mais vídeos...</p>
        )}
      </div>
    </div>
  )
}

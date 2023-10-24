export default function Home() {
  return (
    <div className="gap-4 grid">
      <div className="text-5xl text-center normal-case">
        <a href="/blog.php">Último Post</a>
      </div>
      <div className="text-lg text-justify normal-case">
        {/* <?php posts($conexao, 1, ""); ?> */}
        Último post aqui
      </div>
      <hr />
      <div className="text-5xl text-center bg-[lightgray] p-2.5 rounded-tl-2.5xl rounded-br-2.5xl grid hover:bg-[gray]">
        <a href="/videos.php">Último Vídeo</a>
        {/* <?php videoYoutube($conexao, 0, 1); ?> */}
        Último vídeo aqui
      </div>
    </div>
  )
}

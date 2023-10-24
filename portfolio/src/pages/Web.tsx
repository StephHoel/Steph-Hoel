export default function Web() {
  return (
    <div className="grid gap-4">
      <div className="text-5xl text-center">Feitos por mim</div>

      <div className="text-2xl text-center normal-case">
        {/* <!-- <a href="" target="_blank">Hogwarts Online</a> --> */}
        <strong>Hogwarts Online [link em breve]</strong>

        <div className="text-lg normal-case">
          RPG baseado no universo fantástico de Harry Potter; utiliza HTML, CSS,
          PHP e banco de dados; produzido para aprendizagem; layout próprio; sem
          fins financeiros e/ou comerciais.
        </div>
      </div>

      <div className="text-2xl text-center normal-case">
        <a href="/" target="_blank">
          <strong>Steph Hoel</strong>
        </a>

        <div className="text-lg normal-case">
          Site para exposição de todos os trabalhos produzidos por Stephanye
          Hoelbriegel; utiliza React e TailWindCss; layout próprio.
        </div>
      </div>
    </div>
  )
}

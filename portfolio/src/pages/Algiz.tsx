export default function Algiz() {
  return (
    <div className="text-2xl text-justify normal-case grid gap-4">
      Grupo Algiz é um grupo para youtubers crescerem juntos e cada vez mais
      melhorarem a produção de um modo geral.
      {/* <!-- Confira alguns dos membros aqui:
			[colocar randomicamente 3 ou 4 membros aceitos com uma foto e a descrição do canal juntamente com o nome]

			Se quiser fazer parte do grupo, é só clicar aqui [link para um formulário de inscrição com as perguntas e mais alguns dados importantes] e preencher a ficha com sinceridade.
			 --> */}
      <div className="text-3xl text-center normal-case">
        <a className="text-[red]" href="youtube.com/stephhoe" target="_blank">
          <b>Steph Hoel</b>
        </a>
        <p>Canal que mostra de tudo um pouco!</p>
      </div>
      <div className="text-3xl text-center normal-case">
        <a
          className="text-[red]"
          href="youtube.com/trilhandohistorias1"
          target="_blank"
        >
          <b>Leoney Santos</b>
        </a>
        <p>Um canal literário iniciante muito legal!</p>
      </div>
      <p className="mt-8">E tem muito mais! Em breve terá mais canais aqui!</p>
    </div>
  )
}

export default function Jogos() {
  return (
    <div className="grid gap-4">
      <div className="text-5xl text-center">Jogos - Unity3D</div>

      <div className="text-base text-center normal-case">
        Estes jogos só podem ser jogados no Firefox ou Opera!
      </div>

      {/* <?php //videoYoutube($conexao, 0, 15); ?> */}
      <div className="text-2xl text-center normal-case grid gap-4">
        <a
          // onClick="javascript:location.href='games/planetOfCircles'"
          target="_blank"
          className="font-bold text-2xl"
        >
          Planet of Circles
        </a>
        Os círculos querem dominar o mundo e sua missão é impedir!
        <a
          // onClick="javascript:location.href='games/game'"
          target="_blank"
          className="font-bold text-2xl"
        >
          Game Experimental
        </a>
        Teste sua sorte neste joguinho!
      </div>
    </div>
  )
}

import Sites from '../components/DivSites'
import { Path } from '../lib/props'

export default function Web() {
  return (
    <div className="grid gap-4 text-left">
      <div className="text-5xl text-center">Feitos por mim</div>

      {/* <Sites title={'Hogwarts Online [link em breve]'} to={''}>
        RPG baseado no universo fantástico de Harry Potter; utiliza HTML, CSS,
        PHP e banco de dados; produzido para aprendizagem; layout próprio; sem
        fins financeiros e/ou comerciais.
      </Sites> */}

      <Sites title={'Steph Hoel'} to={Path.home}>
        Site para exposição de todos os trabalhos produzidos por Stephanye
        Hoelbriegel; utiliza React e TailWindCss; layout próprio.
      </Sites>
    </div>
  )
}

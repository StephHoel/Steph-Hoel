import DivTextos from '../components/DivTextos'

export default function Textos() {
  return (
    <div className="grid gap-2 text-2xl p-2">
      <div className="text-justify normal-case">
        Aqui estarão registrados alguns dos textos que eu escrevi, entre
        histórias originais e histórias baseadas em universos registrados. Links
        em breve.
      </div>
      <DivTextos
        title={'Pedras Preciosas'}
        subtitle={'(Original 2014)'}
        link={'https://fanfiction.com.br/historia/563691/Pedras_Preciosas/'}
      >
        Conta a história de duas irmãs que precisam cuidar da casa e trabalhar
        para se sustentarem, enquanto diversos acontecimentos as atrapalham...
        Ou ajudam.
      </DivTextos>
      <DivTextos
        title={'Yui'}
        subtitle={'(Baseada em outra obra/fanfic 2014)'}
        link={'https://fanfiction.com.br/historia/496397/Yui/'}
      >
        Os registros da vida de uma garota diferente da maioria. Com poderes
        fora do comum, Yui conta sua vida e suas aventuras nessa coletânia de
        páginas soltas do seu diário.
      </DivTextos>
    </div>
  )
}

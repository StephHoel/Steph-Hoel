import { Outlet } from 'react-router-dom'

import StephHoelC from '../src/images/Steph_Hoel_c.png'
import StephHoelP from '../src/images/Steph_Hoel_p.png'

import { Path } from './lib/props'

import MenuItem from './components/MenuItem'

export default function Layout() {
  return (
    <div className="p-4 w-3/4 mx-auto" id="body">
      <header className="justify-between items-center pl-4 pb-2 mb-6 select-none">
        <div className="mx-auto relative mt-0 text-7xl flex items-center justify-center gap-8">
          <img src={StephHoelC} alt="Avatar Colorido" className="w-[79px]" />
          Steph Hoel
          <img
            src={StephHoelP}
            alt="Avatar Preto e Branco"
            className="w-[79px]"
          />
        </div>

        <nav className="flex gap-4 justify-center text-center items-center text-black text-3xl mt-4">
          <MenuItem href={Path.home}>Home</MenuItem>
          <MenuItem href={Path.videos}>Videos</MenuItem>
          <MenuItem href={Path.web}>Web</MenuItem>
          <MenuItem href={Path.jogos}>Jogos (editar)</MenuItem>
          <MenuItem href={Path.blog}>Blog</MenuItem>
          <MenuItem href={Path.textos}>Textos</MenuItem>
          {/* <MenuItem href={Path.algiz}>Algiz (editar)</MenuItem> */}
          <MenuItem href={Path.sobre}>Sobre</MenuItem>
          <MenuItem href={Path.contato}>Contato</MenuItem>
        </nav>
      </header>

      <main className="w-3/4 bg-purple-800 mx-auto text-black font-kalam text-4xl rounded-tl-2.5xl rounded-br-2.5xl p-4 text-center">
        <Outlet />
      </main>

      <footer className="text-center items-center justify-center text-xl mt-4 select-none">
        Feito por Steph Hoel @2023
      </footer>
    </div>
  )
}

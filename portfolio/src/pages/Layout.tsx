import { Outlet } from 'react-router-dom'

import MenuItem from '../components/MenuItem'
import StephHoelC from '../images/Steph_Hoel_c.png'
import StephHoelP from '../images/Steph_Hoel_p.png'

export default function Layout() {
  return (
    <div className="p-4 lg:w-1/2 lg:m-auto" id="body">
      <header className="justify-between items-center pl-4 pb-2 mb-6 select-none">
        <div className="mx-auto w-[900px] relative mt-0 text-7xl flex items-center justify-center gap-8">
          <img src={StephHoelC} alt="Avatar Colorido" className="w-[79px]" />
          Steph Hoel
          <img
            src={StephHoelP}
            alt="Avatar Preto e Branco"
            className="w-[79px]"
          />
        </div>

        <nav className="flex gap-4 justify-center text-center items-center text-black text-3xl mt-4">
          <MenuItem href="/">Home</MenuItem>
          <MenuItem href="/videos">Videos</MenuItem>
          <MenuItem href="/web">Web</MenuItem>
          <MenuItem href="/jogos">Jogos</MenuItem>
          <MenuItem href="/blog">Blog</MenuItem>
          <MenuItem href="/textos">Textos</MenuItem>
          <MenuItem href="/algiz">Algiz</MenuItem>
          <MenuItem href="/sobre">Sobre</MenuItem>
          <MenuItem href="/contato">Contato</MenuItem>
        </nav>
      </header>

      <main className="w-3/4 bg-[lightgray] mx-auto text-black font-kalam text-4xl rounded-tl-2.5xl rounded-br-2.5xl p-4 text-center">
        <Outlet />
      </main>

      <footer className="text-center items-center justify-center text-xl mt-4 select-none">
        Feito por Steph Hoel @2023
      </footer>
    </div>
  )
}

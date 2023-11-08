import { Route, Routes } from 'react-router-dom'
import './index.css'

import { Path } from './lib/props'

import Layout from './Layout'

import Algiz from './pages/Algiz'
import Blog from './pages/Blog'
import Contato from './pages/Contato'
import Home from './pages/Home'
import Jogos from './pages/Jogos'
import NoMath from './pages/NoMath'
import Sobre from './pages/Sobre'
import Textos from './pages/Textos'
import Videos from './pages/Videos'
import Web from './pages/Web'

export default function App() {
  return (
    <Routes>
      <Route path={Path.home} element={<Layout />}>
        <Route index element={<Home />} />

        <Route path={Path.videos} element={<Videos />} />
        <Route path={Path.web} element={<Web />} />
        <Route path={Path.jogos} element={<Jogos />} />
        <Route path={Path.blog} element={<Blog />} />
        <Route path={Path.textos} element={<Textos />} />
        <Route path={Path.algiz} element={<Algiz />} />
        <Route path={Path.sobre} element={<Sobre />} />
        <Route path={Path.contato} element={<Contato />} />

        <Route path="*" element={<NoMath />} />
      </Route>
    </Routes>
  )
}

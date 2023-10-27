import { Route, Routes } from 'react-router-dom'
import './index.css'

import Algiz from './pages/Algiz'
import Blog from './pages/Blog'
import Contato from './pages/Contato'
import Home from './pages/Home'
import Jogos from './pages/Jogos'
import Layout from './pages/Layout'
import NoMath from './pages/NoMath'
import Sobre from './pages/Sobre'
import Textos from './pages/Textos'
import Videos from './pages/Videos'
import Web from './pages/Web'

export default function App() {
  return (
    <Routes>
      <Route path="/Steph-Hoel/" element={<Layout />}>
        <Route index element={<Home />} />

        <Route path="/Steph-Hoel/videos" element={<Videos />} />
        <Route path="/Steph-Hoel/web" element={<Web />} />
        <Route path="/Steph-Hoel/jogos" element={<Jogos />} />
        <Route path="/Steph-Hoel/blog" element={<Blog />} />
        <Route path="/Steph-Hoel/textos" element={<Textos />} />
        <Route path="/Steph-Hoel/algiz" element={<Algiz />} />
        <Route path="/Steph-Hoel/sobre" element={<Sobre />} />
        <Route path="/Steph-Hoel/contato" element={<Contato />} />

        <Route path="*" element={<NoMath />} />
      </Route>
    </Routes>
  )
}

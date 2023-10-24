import { Route, Routes } from 'react-router-dom'
import './index.css'

import Algiz from './pages/Algiz'
import Blog from './pages/Blog'
import Home from './pages/Home'
import Jogos from './pages/Jogos'
import Layout from './pages/Layout'
import NoMath from './pages/NoMath'
import Textos from './pages/Textos'
import Videos from './pages/Videos'
import Web from './pages/Web'
import Sobre from './pages/Sobre'
import Contato from './pages/Contato'

export default function App() {
  return (
    <Routes>
      <Route path="/" element={<Layout />}>
        <Route index element={<Home />} />
        <Route path="/videos" element={<Videos />} />
        <Route path="/web" element={<Web />} />
        <Route path="/jogos" element={<Jogos />} />
        <Route path="/blog" element={<Blog />} />
        <Route path="/textos" element={<Textos />} />
        <Route path="/algiz" element={<Algiz />} />
        <Route path="/sobre" element={<Sobre />} />
        <Route path="/contato" element={<Contato />} />

        <Route path="*" element={<NoMath />} />
      </Route>
    </Routes>
  )
}

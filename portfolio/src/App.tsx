import { Route, Routes } from 'react-router-dom'
import './index.css'

import Home from './pages/Home'
import Layout from './pages/Layout'
import NoMath from './pages/NoMath'

export default function App() {
  return (
    <Routes>
      <Route path="/" element={<Layout />}>
        <Route index element={<Home />} />

        <Route path="*" element={<NoMath />} />
      </Route>
    </Routes>
  )
}

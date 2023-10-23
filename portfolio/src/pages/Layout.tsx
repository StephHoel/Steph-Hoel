import { Outlet } from 'react-router-dom'

export default function Layout() {
  return (
    <div className="p-4 lg:w-1/2 lg:m-auto" id="body">
      <header className="flex justify-between items-center pl-4 pb-2 mb-6 border-b border-gray-50">
        <div className="text-4xl grid gap-2">
          <p>Lista de Compras</p>
        </div>

        <nav className="flex gap-4 justify-center text-center items-center">
          Menu
        </nav>
      </header>

      <Outlet />

      <footer className="text-center items-center justify-center text-gray-400 text-xs mt-1">
        Feito por Steph Hoel @2023
      </footer>
    </div>
  )
}

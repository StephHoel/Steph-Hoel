import { ReactNode } from 'react'
import { Link } from 'react-router-dom'

interface MenuItemProps {
  href: string
  children?: ReactNode
}

export default function MenuItem({ href, children }: MenuItemProps) {
  return (
    <Link
      to={href}
      className="rounded-tl-2.5xl rounded-br-2.5xl bg-[lightgray] py-3 px-4 hover:bg-[gray]"
    >
      {children}
    </Link>
  )
}

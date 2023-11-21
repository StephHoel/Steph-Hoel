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
      target={children === 'Blog' ? '_blank' : ''}
      className="py-3 px-4 rounded-tl-2.5xl rounded-br-2.5xl bg-purple-500
      hover:bg-purple-700"
    >
      {children}
    </Link>
  )
}

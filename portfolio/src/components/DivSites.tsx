import { ArrowRight } from '@phosphor-icons/react'
import { PropsWithChildren } from 'react'

interface SitesProps extends PropsWithChildren {
  title: string
  to: string
}

export default function Sites({ to, title, children }: SitesProps) {
  return (
    <div className="grid gap-2">
      <a
        href={to}
        target="_blank"
        className="text-4xl font-bold flex gap-2"
        rel="noreferrer"
      >
        <ArrowRight /> {title}
      </a>

      <p className="text-2xl normal-case">{children}</p>
    </div>
  )
}

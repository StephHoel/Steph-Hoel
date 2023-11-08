import { PropsWithChildren } from 'react'

interface TextosProps extends PropsWithChildren {
  title: string
  subtitle: string
  link: string
}

export default function DivTextos({
  title,
  subtitle,
  link,
  children,
}: TextosProps) {
  return (
    <div className="text-justify grid gap-2 my-2">
      <p className="text-4xl">
        <a href={link} target="_blank" rel="noreferrer">
          <span className="font-bold">{title}</span> {subtitle}
        </a>
      </p>
      <p>{children}</p>
    </div>
  )
}

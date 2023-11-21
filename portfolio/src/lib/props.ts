export const Path = {
  home: '/Steph-Hoel/',
  videos: '/Steph-Hoel/videos',
  web: '/Steph-Hoel/web',
  jogos: '/Steph-Hoel/jogos',
  blog: 'https://stephhoel.github.io/blog/',
  textos: '/Steph-Hoel/textos',
  algiz: '/Steph-Hoel/algiz',
  sobre: '/Steph-Hoel/sobre',
  contato: '/Steph-Hoel/contato',
}

export const Style = {
  input: 'p-2 rounded outline-none ',
  button: {
    all: 'bg-gray-500 hover:bg-gray-400 rounded my-2 p-2 select-none ',
    not: 'pointer-events-none text-2xl ',
    yes: 'pointer-events-auto ',
  },
  form: 'w-1/2 mx-auto grid gap-4 ',
  label: 'text-left ',
  title: 'text-center mb-4 text-6xl ',
  divError: 'text-red-500 select-none text-left mt-2',
}

export interface Post {
  idPost: string
  idAuthor: string
  title: string
  content: string
  state: string
  createdAt: Date
  updatedAt: Date
}

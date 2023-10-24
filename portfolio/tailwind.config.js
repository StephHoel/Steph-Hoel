/** @type { import('tailwindcss').Config } */
export const purge = ['./src/**/*.{js,jsx,ts,tsx}', './public/index.html']
export const theme = {
  extend: {
    fontFamily: {
      kalam: ['Kalam'],
      nothing: ['Nothing You Could Do'],
    },
    borderRadius: {
      '2.5xl': '20px',
    },
  },
}

module.exports = {
  purge: [
    './resources/views/**/*.blade.php',
    
  ],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {},
  },
  variants: {
    extend: {},
  },
  plugins: [],
}
const ta_gallery_safelist = require('./node_modules/@markusantonwolf/ta-gallery/src/plugin/safelist')

module.exports = {
    purge: {
        // ...
        options: {
            safelist: [...ta_gallery_safelist],
        },
        // ...
    },
    // ...
    theme: {
        // ...
        taGallery: {
            animations: ['swing', 'swipe', 'slide', 'rotate', 'snake', 'window', 'scroll', 'fade', 'dynamic'],
            animation_default: 'slide', // default value
            aspect_ratios: [
                // all aspect ratios
                'square',
                'movietone',
                'large',
                'tv',
                'academy',
                'imax',
                'classic',
                'still',
                'modern',
                'common',
                'golden',
                'super',
                'hd',
                'wide',
                {
                    instagram: 3 / 5, // add your own aspect ratio
                },
            ],
        },
        // ...
    },
    // ...
    variants: {
        // ...
        taGallery: ['responsive'], // default value
        extend: {
            // ...
        },
    },
    // ...
    plugins: [
        require('@markusantonwolf/ta-gallery')({
            respectPrefix: true, // respect prefix option in config: true (default) | false
            respectImportant: true, // respect important option in config: true (default) | false
        }),
    ],
}
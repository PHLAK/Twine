import { defineConfig } from 'vitepress'

// const head = [
//     ['link', { rel: 'icon', href: '/images/twine.svg' }],
// ];

export default defineConfig({
    title: 'Twine Documentation',
    description: 'Official documentation for the phlak/twine package.',

    // head: head,

    themeConfig: {
        // logo: '/images/twine.svg',

        nav: [
            { text: 'Home', link: '/' },
            { text: 'Docs', link: '/docs/what-is-twine' },
            { text: 'Changelog', link: 'https://github.com/PHLAK/Twine/releases' },
        ],

        sidebar: [
            {
                text: 'Introduction',
                items: [
                    { text: 'What is Twine?', link: '/docs/what-is-twine' },
                ]
            },
            {
                text: 'Getting Started',
                items: [
                    { text: 'Installation', link: '/docs/installation' },
                    { text: 'Usage', link: '/docs/usage' },
                    { text: 'Method Chaining', link: '/docs/method-chaining' }, // Merge with Usage?
                    { text: 'Troubleshooting', link: '/docs/troubleshooting' },
                ]
            },
            {
                text: 'Methods',
                items: [
                    { text: 'after', link: '/docs/methods/after' },
                    { text: 'append', link: '/docs/methods/append' },
                    { text: 'base64', link: '/docs/methods/base64' },
                    // Additional methods here...
                ]
            },
        ],

        outline: { level: [2, 4] },

        search: { provider: 'local' },

        socialLinks: [
            { icon: 'bluesky', link: 'https://bsky.app/profile/phlak.dev' },
            { icon: 'github', link: 'https://github.com/PHLAK/Twine' },
        ],

        editLink: {
            pattern: 'https://github.com/PHLAK/Twine/edit/master/docs/:path'
        },

        lastUpdated: true,
    }
})

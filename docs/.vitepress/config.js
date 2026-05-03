import { defineConfig } from 'vitepress'
import fs from 'fs'
import path from 'path';

const head = [
    ['link', { rel: 'icon', href: '/images/twine.svg' }],
];

export default defineConfig({
    title: 'Twine Documentation',
    description: 'Official documentation for the phlak/twine package.',

    head: head,

    themeConfig: {
        logo: '/images/twine.svg',

        nav: [
            { text: 'Home', link: '/' },
            { text: 'Docs', link: '/what-is-twine' },
            { text: 'Changelog', link: 'https://github.com/PHLAK/Twine/releases' },
        ],

        sidebar: [
            {
                text: 'Introduction',
                items: [
                    { text: 'What is Twine?', link: '/what-is-twine' },
                ],
            },
            {
                text: 'Getting Started',
                items: [
                    { text: 'Installation', link: '/installation' },
                    { text: 'Usage', link: '/usage' },
                    { text: 'Troubleshooting', link: '/troubleshooting' },
                ],
            },
            {
                text: 'Methods',
                items: fs.readdirSync(__dirname + '/../methods').filter(
                    (file) => file.endsWith('.md')
                ).map(function (file) {
                    const method = path.parse(file)

                    return { text: method.name, link: `/methods/${method.name}` }
                })
            },
        ],

        outline: { level: [2, 4] },

        search: { provider: 'local' },

        socialLinks: [
            { icon: 'bluesky', link: 'https://bsky.app/profile/phlak.dev' },
            { icon: 'github', link: 'https://github.com/PHLAK/Twine' },
        ],

        editLink: {
            pattern: 'https://github.com/PHLAK/Twine/edit/master/:path'
        },

        lastUpdated: true,
    }
})

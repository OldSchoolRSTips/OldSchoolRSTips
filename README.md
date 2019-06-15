# To-do

* Tip count at the bottom, after version number
* Subdomains simply set a different landing page and flip an initial tag. Nothing more.
* F2p toggle option. Clicking the gold/silver star/slider toggles it to the other color and includes/filters tips that are tagged as f2p or p2p. No more f2p in subdomains - loading a link to an F2p tip automatically turns the F2p filter ON.
* Anonymous Google Forms tip submission. What is the tip? Who does it pertain to (category)?
* Curl tool (Python) to check+move JSON files from GitHub to webserver
* Instantaneous realtime search tool
* Basic forward and back
* JS changes the page title
* Proper landing page and SEO/metatags
* Start at #1, not #100
* Category icons to the right of the title (click them to alert what they mean: "This is an x category")
* Add wiki links to as many existing tips as possible
* Different wallpapers per category
* Tip favoriting/liking
* Prevent the same tip from being rolled twice in a row
* Prevent the same tip from being rolled twice in the same session (history button at bottom right, prayer brain icon?)
* Different font for the site header/slogan
* Mobile stylesheet
* See Also section that links to other tips

# What is OldSchoolRS.Tips?

It's a website that hosts a database of the Old School RuneScape community's favorite tips and tidbits of information. If OSRS had loading screen tips, this would be what it would show. All tips are bite-sized, community-sourced, weighted equally, and anyone can submit one via a pull request. The behavior of the site is random by design - you never know what tip you'll roll next.

# Why?

We live in an era where content engines like Reddit and YouTube are constantly being fed, and old information is decaying and dying. Tips for Old School RuneScape suffer greatly, especially when the creators of the information delete their accounts or an algorithm de-ranks their content. Or, even worse, the forum they were hosted on goes offline. This has been happening at an alarming rate over this past year, so I'm building an immortal area to preserve this information.

Old School RuneScape players need a reliable one-stop-shop for easy-to-lose tips on the game that they can contribute to equally. This outlet needs to place equal weighting on all tips as well, so as to prevent them from decay. The information also needs to be something that's in a small and efficient format so they can download and retain it themselves. Small data lives forever!

# Do you intend to monetize?

No, this is a tiny website being hosted on a Raspberry Pi. I don't think it will ever even require donations in its current scope. This is a philanthropic effort. These tips have benefited me and made my gameplay much better over the few years I have discovered them, and I want the trail to be much easier for those that traverse it in my wake.

I do intend to look into ways to track likes, however. This is not monetization (by me), but I'm willing to bet Google would make money off of me using their services. If I track likes and such, it will have to be done in such a way that preserves the private identities and credentials of those that use the website or participate. We live in a very scary era of game accounts being hacked and stolen all the time. A lot of this happens because people maliciously create websites and software tools that are designed to get vital information from their users to aid in account theft. Transparency and time are often the only things that can alliviate suspicion.

That means no login systems for likes. It'll most likely be some sort of one-way hash of an IP/useragent salt mix being stored in an SQL database via an AJAX call. This would allow for a "ranking" system where users can vote their most desired tips to the top of a hall-of-fame like list.

Of course, all of it will be open source for the community to see besides the actual database contents.

# Is this competing with the wiki?

No, I love the wiki and contribute to it all the time. In fact, this tip database regularly links directly *to* the wiki.

However, the wiki is a wiki. It's not a catalog. It's an organized encyclopedic compilation of media and knowledge, and some pages can be very large.

It's also different in its legal contractual obligations. The wiki is not allowed to discuss anything third-party, as Jagex's contract requires in exchange for them being the "official" wiki. On the plus size, the information there is more pure and focused. On the downside, we're not allowed to talk about things like RuneLite, mousekeys, etc, that virtually the entire community uses at this point. That alone leaves a pretty big gap, which we can fill.

The majority of content, videos, software, tools, and resources are actually *not* created by Jagex. People need a place to discover new information that doesn't involve a deep Google search or asking someone else.

tldr:

OldSchoolRSTips = catalog, bite-sized information, with third party software discussion (within the rules of the game)
Official wiki = notable content, large information, no third party discussion (even if it's allowed by the rules)

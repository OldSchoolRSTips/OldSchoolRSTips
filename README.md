# What is OldSchoolRS.Tips?

It's a delivery vessel I designed that's sole job is to give individual bits of information from the tips file (tips.json) to users. All tips are bite-sized, community-sourced, weighted equally, and anyone can submit one via a pull request.

# Why?

We live in an era where content engines like Reddit and YouTube are constantly being fed, and old information is decaying and dying. Tips for Old School RuneScape suffer greatly, especially when the creators of the information delete their accounts or an algorithm de-ranks their content. Or, even worse, the forum they were hosted on goes offline. This has been happening at an alarming rate over this past year, so I'm building an immortal area to preserve this information.

Old School RuneScape players need a reliable one-stop-shop for easy-to-lose tips on the game that they can contribute to equally. This outlet needs to place equal weighting on all tips as well, so as to prevent them from decay. The information also needs to be something that's in a small and efficient format so they can download and retain it themselves. Small data lives forever!

# Do you intend to monetize?

No, this is a tiny website being hosted on a Raspberry Pi. I don't think it will ever even require donations in its current scope. This is a philanthropic effort. These tips have benefited me and made my gameplay much better over the few years I have discovered them, and I want the trail to be much easier for those that traverse it in my wake.

I do intend to look into ways to track likes, however. This is not monetization (by me), but I'm willing to bet Google would make money off of me using Analytics. If I track likes, it will have to be done in such a way that preserves the private identities of those that like it. That means no login systems. It'll most likely be some sort of one-way hash of an IP/useragent salt mix being stored in an SQL database via an AJAX call. This would allow for a "ranking" system where users can vote their most desired tips to the top of a hall-of-fame like list.

# Is this competing with the wiki?

No, I love the wiki and contribute to it all the time. In fact, this tip database regularly links directly *to* the wiki.

However, the wiki is a wiki. It's not a catalog. It's an encyclopedic compilation of knowledge, and some pages can be very large. It's also different in its legal contract. The wiki is not allowed to discuss anything third-party, as Jagex's contract requires in exchange for them being the "official" wiki. On the plus size, the information there is more pure. On the downside, we're not allowed to talk about things like RuneLite, mousekeys, etc, that virtually the entire community uses at this point. That alone leaves a pretty big gap, which we can fulfill.

tldr:

OldSchoolRSTips = catalog, bite-sized information, with third party software discussion (within the rules of the game)
Official wiki = notable content, large information, no third party discussion (even if it's allowed by the rules)

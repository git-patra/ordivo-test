function getScheme(text) {
    const elements = text.match(/(sc-[A-Za-z])\w+/g)

    return elements?.map((ele) => ele.replace('sc-', ''))
}

console.log(getScheme("<i sc-root>Hello</i>"))
console.log(getScheme("“<div><div sc-rootbear title=”Oh My”>Hello <i sc-org>World</i></div></div>"))
function getScheme(text) {
    const elements = text.match(/(sc-)([A-Za-z])*(.="[A-Za-z]\w+")/g)

    return elements?.map((ele) => {
        const result = ele.replace('sc-', '').replace(`"`, '').split('=')

        return {
            [result[0]]: result[1].replace(`"`, '')
        }
    })
}

console.log(getScheme(`<div sc-prop sc-alias="" sc-type="Organization"><div sc-name="Alice">Hello <i sc-name="Wonderland">World</i></div></div>`))
function initWooCommerceMeiliSearch() {
  const el = document.getElementById('wcms__search-terms')
  el.addEventListener('keyup', (event) => {
    const terms = event.target.value
    searchWooCommerceMeiliSearch(terms)
  })
}

function searchWooCommerceMeiliSearch(terms) {
  (async () => {
    const client = new MeiliSearch({
      host: 'http://188.166.32.110:7700',
      apiKey: 'b4c3b63476439e0164b9a44efc38ff41c39b8e9c6229aa148d763aa611e8e06f',
    })

    const index = client.getIndex('wcms_products')
    const result = await index.search(terms)

    const el = document.getElementById('wcms__search-hits')
    
    let html = '<ul>'
    result.hits.forEach(hit => {
      html += `<li>${hit.name} - ${hit.price_html} - ${hit.stock_quantity || 0} units</li>`
    })
    html += '</ul>'
    el.innerHTML = html
  })()
}

document.addEventListener('DOMContentLoaded', initWooCommerceMeiliSearch)

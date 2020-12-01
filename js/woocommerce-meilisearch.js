function initWooCommerceMeiliSearch() {
  const el = document.getElementById('wcms__search-terms')
  if (! el) {
    return false
  }

  el.addEventListener('keyup', (event) => {
    const terms = event.target.value
    searchWooCommerceMeiliSearch(terms)
  })

  searchWooCommerceMeiliSearch('')
}

function searchWooCommerceMeiliSearch(terms) {
  (async () => {
    const client = new MeiliSearch({
      host: `${wcms.hostname}:${wcms.port}`,
      apiKey: wcms.public_key,
    })

    const index = client.getIndex(wcms.index)
    const result = await index.search(terms, {
      facetsDistribution: ['*']
    })

    const el = document.getElementById('wcms__search-hits')
    
    let html = '<ul>'
    result.hits.forEach(hit => {
      html += `<li><a href="/wp-admin/post.php?post=${hit.ID}&action=edit">${hit.name} - ${hit.price_html}</a> - ${hit.stock_quantity || 0} units</li>`
    })
    html += '</ul>'
    el.innerHTML = html
  })()
}

document.addEventListener('DOMContentLoaded', initWooCommerceMeiliSearch)

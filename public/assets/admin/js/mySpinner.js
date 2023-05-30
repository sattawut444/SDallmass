function mySpinner(el, status, obj = {}) {

    let $element = $(el)

    let sp_site = !obj['site'] ? 'sm' : obj['site'];
    let sp_color = !obj['color'] ? '' : obj['color'];

    let $spinner = `<div class="spinner-border ${sp_color} spinner-border-sm" role="status">
          <span class="visually-hidden">Loading...</span>
        </div>`

    if (status === 'show') {
        $element.prop('disabled', true);
        let content_default = $element.html()
        $element.html($spinner)
        $element.append(`<div class="content_default" style="display:none;">${content_default }</div>`)
    } else if (status === 'hide') {
        $element.prop('disabled', false);

        if ($element.find('.content_default').length > 0) {
            let content_default = $element.find('.content_default').html()
            $element.html(content_default)
        }


    }

}
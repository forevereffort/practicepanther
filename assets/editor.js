/**
 * Add custom formats (sup, sub) to text editor
 */
(function (wp) {
  var SupButton = function (props) {
    return wp.element.createElement(
      wp.blockEditor.RichTextToolbarButton, {
        icon: 'arrow-up',
        title: 'Sup',
        onClick: function () {
          props.onChange(wp.richText.toggleFormat(
            props.value,
            { type: 'custom-formats/sup' }
          ))
        },
        isActive: props.isActive
      }
    )
  }
  var SubButton = function (props) {
    return wp.element.createElement(
      wp.blockEditor.RichTextToolbarButton, {
        icon: 'arrow-down',
        title: 'Sub',
        onClick: function () {
          props.onChange(wp.richText.toggleFormat(
            props.value,
            { type: 'custom-formats/sub' }
          ))
        },
        isActive: props.isActive
      }
    )
  }

  wp.richText.registerFormatType(
    'custom-formats/sup', {
      title: 'Sup',
      tagName: 'sup',
      className: null,
      edit: SupButton
    }
  )
  wp.richText.registerFormatType(
    'custom-formats/sub', {
      title: 'Sub',
      tagName: 'sub',
      className: null,
      edit: SubButton
    }
  )
})(window.wp);

/**
   * Register Quote with person name and title block
   */
(function () {
  const el = window.wp.element.createElement
  const { registerBlockType } = window.wp.blocks
  const { RichText } = window.wp.editor

  const icon = el('svg', { width: 24, height: 24 },
    el(
      'path',
      { d: 'M18.62 18h-5.24l2-4H13V6h8v7.24L18.62 18zm-2-2h.76L19 12.76V8h-4v4h3.62l-2 4zm-8 2H3.38l2-4H3V6h8v7.24L8.62 18zm-2-2h.76L9 12.76V8H5v4h3.62l-2 4z' }
    )
  )

  registerBlockType('custom-blocks/quote', {
    title: 'Quote w/ Name',
    icon: icon,
    category: 'common',
    keywords: ['blockquote', 'quote'],

    attributes: {
      quote: {
        type: 'string',
        source: 'html',
        selector: 'p'
      },
      name: {
        type: 'string',
        source: 'html',
        selector: 'h5'
      },
      title: {
        type: 'string',
        source: 'html',
        selector: 'cite'
      }
    },

    edit: function (props) {
      // function onChangeValue (attribute, value) {
      //   props.setAttributes({ attribute: value })
      // }

      return (
        el('blockquote', { className: props.className + '  wp-block-quote' },
          el(
            RichText,
            {
              tagName: 'p',
              format: 'string',
              value: props.attributes.quote,
              // formattingControls: ['bold', 'italic'],
              onChange: function (newContent) {
                props.setAttributes({ quote: newContent })
              },
              placeholder: 'Write the quote...'
            }
          ),
          el(
            RichText,
            {
              tagName: 'h5',
              format: 'string',
              value: props.attributes.name,
              // formattingControls: ['bold', 'italic'],
              onChange: function (newContent) {
                props.setAttributes({ name: newContent })
              },
              placeholder: 'Write the name...'
            }
          ),
          el(
            RichText,
            {
              tagName: 'cite',
              format: 'string',
              value: props.attributes.title,
              className: 'wp-block-quote__citation',
              // formattingControls: ['bold', 'italic'],
              onChange: function (newContent) {
                props.setAttributes({ title: newContent })
              },
              placeholder: 'Write the title...'
            }
          )
        )
      )
    },

    save: function (props) {
      return (
        el('blockquote', { className: props.className },
          el(RichText.Content, {
            tagName: 'p',
            value: props.attributes.quote
          }),
          el(RichText.Content, {
            tagName: 'h5',
            value: props.attributes.name
          }),
          el(RichText.Content, {
            tagName: 'cite',
            value: props.attributes.title
          })
        )
      )
    }
  })
})()

/**
 * add 'Shadow' style to Image Block
 */
const { __ } = window.wp.i18n
const { registerBlockStyle } = window.wp.blocks

registerBlockStyle('core/image', {
  name: 'shadow-image',
  label: __('Shadow'),
  isDefault: false
})

registerBlockStyle('core/image', {
  name: 'desktop-image',
  label: __('Desktop'),
  isDefault: false
})

registerBlockStyle('core/image', {
  name: 'mobile-image',
  label: __('Mobile'),
  isDefault: false
})

registerBlockStyle('core/image', {
  name: 'desktop-shadow-image',
  label: __('Desktop Shadow'),
  isDefault: false
})

registerBlockStyle('core/image', {
  name: 'mobile-shadow-image',
  label: __('Mobile Shadow'),
  isDefault: false
})

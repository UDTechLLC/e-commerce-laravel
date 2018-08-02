const BlockEmbed = window.Quill.import('blots/block/embed');

class VideoBlot extends BlockEmbed {
  static create(value) {

    let node = super.create();

    if (value instanceof Object) {
      node.setAttribute('src', value.url);
      node.setAttribute('height', value.height);
      node.setAttribute('width', value.width);
    } else {
      node.setAttribute('src', value);
    }

    node.setAttribute('frameborder', '0');
    node.setAttribute('allowfullscreen', true);
    node.setAttribute('allow', 'autoplay; encrypted-media');
    node.className = 'ql-video';

    return node;
  }

  static formats(node) {
    let format = {};
    if (node.hasAttribute('height')) {
      format.height = node.getAttribute('height');
    }
    if (node.hasAttribute('width')) {
      format.width = node.getAttribute('width');
    }
    return format;
  }

  static value(node) {

    return node.getAttribute('src');
  }

  format(name, value) {
    if (name === 'height' || name === 'width') {
      if (value) {
        this.domNode.setAttribute(name, value);
      } else {
        this.domNode.removeAttribute(name, value);
      }
    } else {
      super.format(name, value);
    }
  }
}

VideoBlot.blotName = 'video';
VideoBlot.tagName = 'iframe';

export { VideoBlot }
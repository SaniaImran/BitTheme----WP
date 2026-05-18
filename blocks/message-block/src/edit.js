import { RichText, useBlockProps } from '@wordpress/block-editor';

export default function Edit({ attributes, setAttributes }) {

    const blockProps = useBlockProps();

    return (
        <div {...blockProps}>
            <RichText
                tagName="div"
                value={attributes.message}
                onChange={(message) => {
                    setAttributes({ message });
                }}
                placeholder="Write your message..."
            />
        </div>
    );
}
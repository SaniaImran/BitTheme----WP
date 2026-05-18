import { RichText, useBlockProps } from '@wordpress/block-editor';

export default function save({ attributes }) {

    const blockProps = useBlockProps.save();

    return (
        <div {...blockProps}>
            <RichText.Content
                tagName="div"
                value={attributes.message}
            />
        </div>
    );
}
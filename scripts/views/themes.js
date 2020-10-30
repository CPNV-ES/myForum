export default class ThemesView {

    async render() {

        let response = await fetch('/api/references', { method: 'GET' });
        let references = await response.json();

        return `
            <h1>Thèmes</h1>
            <table>
                <tbody>
                    ${references.map(ref => {
                        return `<tr>
                            <td>${ref.description}</td>
                        </tr>`;
                    }).join('')}
                </tbody>
            </table>
        `;
    }
}
<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:output method="html" indent="yes"/>

    <xsl:template match="/catalog">
        <html>
            <head>
                <title>Book Catalog</title>
                <style>
                    body {
                        font-family: Times New Roman;
                        margin: 20px;
                    }
                    h1 {
                        font-weight: bold;
                        margin-bottom: 20px;
                    }
                    table {
                        width: 100%;
                        border-collapse: collapse;
                        border: 1px solid #000; 
                    }
                    th, td {
                        border: 1px solid black;
                        padding: 8px 10px;
                    }
                    th {
                        background-color: blue; 
                        font-weight: bold;
                        color: white;
                    }
                </style>
            </head>
            <body>
                <h1>Book Catalog</h1>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Publish Date</th>
                            <th>Author</th>
                            <th>Genre</th>
                            <th>Description</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <xsl:for-each select="book">
                            <tr>
                                <td><xsl:value-of select="@id"/></td>
                                <td><xsl:value-of select="title"/></td>
                                <td><xsl:value-of select="publish_date"/></td>
                                <td><xsl:value-of select="author"/></td>
                                <td><xsl:value-of select="genre"/></td>
                                <td><xsl:value-of select="description"/></td>
                                <td><xsl:value-of select="price"/></td>
                            </tr>
                        </xsl:for-each>
                    </tbody>
                </table>
            </body>
        </html>
    </xsl:template>

</xsl:stylesheet>
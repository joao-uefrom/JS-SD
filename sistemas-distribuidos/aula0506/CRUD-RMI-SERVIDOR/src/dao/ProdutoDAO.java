package dao;

import bean.ProdutoBean;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.util.ArrayList;

public class ProdutoDAO {

    public static void insert(ProdutoBean produto) {
        String sql = "INSERT INTO produto(descricao, preco, quantidade) VALUES (?, ?, ?)";

        try {
            Connection conexao = ConexaoDB.retornaConexao();
            PreparedStatement stmt = conexao.prepareStatement(sql);

            stmt.setString(1, produto.getDescricao());
            stmt.setDouble(2, produto.getPreco());
            stmt.setInt(3, produto.getQuantidade());

            stmt.execute();

        } catch (Exception e) {
            System.out.println("Erro na função INSERT: " + e.toString());
        }
    }

    public static ArrayList<ProdutoBean> select() {
        ArrayList<ProdutoBean> produtos = new ArrayList<>();

        String sql = "SELECT * FROM produto";

        try {
            Connection conexao = ConexaoDB.retornaConexao();
            PreparedStatement stmt = conexao.prepareStatement(sql);

            ResultSet result = stmt.executeQuery();

            while (result.next()) {
                ProdutoBean temporario = new ProdutoBean();
                
                temporario.setId(result.getInt("id"));
                temporario.setDescricao(result.getString("descricao"));
                temporario.setPreco(result.getDouble("preco"));
                temporario.setQuantidade(result.getInt("quantidade"));
                produtos.add(temporario);
            }

            return produtos;

        } catch (Exception e) {
            System.err.println("Erro na função SELECT: " + e.toString());
        }
        return null;
    }

    public void update() {
    }

    public static void delete(int id) {
        String sql = "DELETE FROM produto WHERE id = ?";

        try {
            Connection conexao = ConexaoDB.retornaConexao();
            PreparedStatement stmt = conexao.prepareStatement(sql);
            stmt.setInt(1, id);
            stmt.execute();
        } catch (Exception e) {
            System.err.println("Erro na função DELETE: " + e.toString());
        }

    }

}

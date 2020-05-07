package dao;

import bean.CardapioBean;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.util.ArrayList;

public class CardapioDAO {

    public static void insert(CardapioBean cardapio) {
        String sql = "INSERT INTO cardapio(prato, preco, porcoes) VALUES (?, ?, ?)";

        try {
            Connection conexao = ConexaoDB.retornaConexao();
            PreparedStatement stmt = conexao.prepareStatement(sql);

            stmt.setString(1, cardapio.getPrato());
            stmt.setDouble(2, cardapio.getPreco());
            stmt.setInt(3, cardapio.getPorcoes());

            stmt.execute();

        } catch (Exception e) {
            System.out.println("Erro na função INSERT: " + e.toString());
        }
    }

    public static ArrayList<CardapioBean> select() {
        ArrayList<CardapioBean> cardapios = new ArrayList<>();

        String sql = "SELECT * FROM cardapio";

        try {
            Connection conexao = ConexaoDB.retornaConexao();
            PreparedStatement stmt = conexao.prepareStatement(sql);

            ResultSet result = stmt.executeQuery();

            while (result.next()) {
                CardapioBean temporario = new CardapioBean();
                
                temporario.setId(result.getInt("id"));
                temporario.setPrato(result.getString("prato"));
                temporario.setPorcoes(result.getInt("porcoes"));
                temporario.setPreco(result.getDouble("preco"));
                cardapios.add(temporario);
            }

            return cardapios;

        } catch (Exception e) {
            System.err.println("Erro na função SELECT: " + e.toString());
        }
        return null;
    }

    public void update() {
    }

    public static void delete(int id) {
        String sql = "DELETE FROM cardapio WHERE id = ?";

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

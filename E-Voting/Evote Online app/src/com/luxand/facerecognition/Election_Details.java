package com.luxand.facerecognition;

import android.app.Activity;
import android.content.Intent;
import android.os.AsyncTask;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.ListView;
import android.widget.TextView;
import android.widget.Toast;

import org.apache.http.HttpEntity;
import org.apache.http.HttpResponse;
import org.apache.http.NameValuePair;
import org.apache.http.client.HttpClient;
import org.apache.http.client.entity.UrlEncodedFormEntity;
import org.apache.http.client.methods.HttpPost;
import org.apache.http.impl.client.DefaultHttpClient;
import org.apache.http.message.BasicNameValuePair;
import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import com.luxand.facerecognition.R;

import java.io.BufferedReader;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.util.ArrayList;
import java.util.List;

/**
 * 
 */
public class Election_Details extends Activity {

    private TextView electionName, name, date, ward, desc;
    private String election_name, election_id, user_id;

    public static Button vote;

    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.selected_election);
        String name1 = getIntent().getStringExtra("election_name");
        user_id = getIntent().getStringExtra("user_id");
        System.out.println("Intent Extra "+name1);
        System.out.println("Election Detail id "+user_id);
        election_name = name1.substring(name1.indexOf(")")+1, name1.length());
        election_id = name1.substring(0, name1.indexOf(")"));
        electionName = (TextView) findViewById(R.id.name_tv);
        electionName.setText(election_name);
        name = (TextView)findViewById(R.id.name);
        date = (TextView)findViewById(R.id.date);
        ward = (TextView)findViewById(R.id.ward);
        desc = (TextView)findViewById(R.id.desc);
        vote = (Button)findViewById(R.id.vote);

        new get_details().execute(election_id);
        new is_today().execute(election_id);

        vote.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent2 = new Intent(getApplicationContext(), CandidateList.class);
                intent2. putExtra("user_id", user_id);
                intent2. putExtra("election_id", election_id);
                intent2. putExtra("election_name", election_name);
                finish();
                startActivity(intent2);

            }
        });
    }

    @Override
    public void onBackPressed()
    {
        Intent intent1 = new Intent(getApplicationContext(), Election_List.class);
        intent1.putExtra("user_id", user_id);
        startActivity(intent1);
        finish();
    }

    public class get_details extends AsyncTask<String, String, String> {

        String function = "get_election";
        InputStream is = null;
        String str;

        protected void onPreExecute() {

        }

        protected String doInBackground(String... param) {
            HttpClient httpClient = new DefaultHttpClient();
            HttpPost httppost = new HttpPost(Constants.URL + function);

            try {
                List<NameValuePair> namevaluepair = new ArrayList<NameValuePair>();
                namevaluepair.add(new BasicNameValuePair("election_id", election_id));
                httppost.setEntity(new UrlEncodedFormEntity(namevaluepair));

                HttpResponse response = httpClient.execute(httppost);
                HttpEntity entity = response.getEntity();
                //	String str = EntityUtils.toString(entity);

                // read content
                is = entity.getContent();

            } catch (Exception e) {

                Log.e("log_tag", "Error in http connection " + e.toString());
            }
            try {
                BufferedReader br = new BufferedReader(
                        new InputStreamReader(is));
                StringBuilder sb = new StringBuilder();
                String line = "";
                while ((line = br.readLine()) != null) {
                    sb.append(line + "\n");
                }
                is.close();
                str = sb.toString();
                System.out.println("Result do in background" + str);


            } catch (Exception e) {

                Log.e("log_tag", "Error converting result " + e.toString());
            }
            return str;


        }

        @Override
        protected void onPostExecute(String result) {
            try {

                JSONObject object = new JSONObject(result);
                String success = object.getString("success");
                if (success.equals("true")) {
                    JSONArray array1 = object.getJSONArray("election");
                    for (int i = 0; i < array1.length(); i++) {
                        JSONObject object2 = array1.getJSONObject(i);
                        name.setText(object2.getString("name"));
                        date.setText(object2.getString("date"));
                        ward.setText(object2.getString("ward"));
                        desc.setText(object2.getString("description"));

                    }

                }


            } catch (JSONException e) {

                e.printStackTrace();
            }

        }
    }

    public class is_today extends AsyncTask<String, String, String> {

        String function = "is_election";
        InputStream is = null;
        String str;

        protected void onPreExecute() {

        }

        protected String doInBackground(String... param) {
            HttpClient httpClient = new DefaultHttpClient();
            HttpPost httppost = new HttpPost(Constants.URL + function);

            try {
                List<NameValuePair> namevaluepair = new ArrayList<NameValuePair>();
                namevaluepair.add(new BasicNameValuePair("election_id", election_id));
                httppost.setEntity(new UrlEncodedFormEntity(namevaluepair));

                HttpResponse response = httpClient.execute(httppost);
                HttpEntity entity = response.getEntity();
                //	String str = EntityUtils.toString(entity);

                // read content
                is = entity.getContent();

            } catch (Exception e) {

                Log.e("log_tag", "Error in http connection " + e.toString());
            }
            try {
                BufferedReader br = new BufferedReader(
                        new InputStreamReader(is));
                StringBuilder sb = new StringBuilder();
                String line = "";
                while ((line = br.readLine()) != null) {
                    sb.append(line + "\n");
                }
                is.close();
                str = sb.toString();
                System.out.println("Result do in background" + str);


            } catch (Exception e) {

                Log.e("log_tag", "Error converting result " + e.toString());
            }
            return str;


        }

        @Override
        protected void onPostExecute(String result) {
            try {

                JSONObject object = new JSONObject(result);
                String success = object.getString("success");
                if (success.equals("true")) {
                    vote.setVisibility(View.VISIBLE);
                }


            } catch (JSONException e) {

                e.printStackTrace();
            }

        }
    }
}
